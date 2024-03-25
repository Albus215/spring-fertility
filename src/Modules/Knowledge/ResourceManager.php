<?php


namespace Spring\Modules\Knowledge;


class ResourceManager
{
	public $resourceTopicFieldID = 'knowledgebase_topic';
	public $resourceTopicID = 'knowledge_topic';
	public $resourcePostsID = 'knowledge';
	public $resourceTestsID = 'test';
	public $resourceTreatmentsID = 'treatment';

	public $treePostsID = 'posts';
	public $treeTreatmentsChildrenID = 'treatments';
	public $treeTestsChildrenID = 'tests';

	private $resourcesTree = [];

	/**
	 * @return array
	 */
	public function getResourcesTree()
	{
		if (empty($this->resourcesTree)) $this->createResourcesTree();
		return $this->resourcesTree;
	}

	public function createResourcesTree()
	{
		$topicsRaw = get_terms([
			'taxonomy'     => $this->resourceTopicID,
			'hide_empty'   => true,
			'fields'       => 'all',
			'hierarchical' => true,
		]);

		$postsRaw = get_posts([
			'post_type'   => [$this->resourcePostsID, $this->resourceTestsID, $this->resourceTreatmentsID],
			'post_status' => 'publish',
			'orderby'     => 'menu_order',
			'order'       => 'ASC',
			'numberposts' => -1,
		]);

		$this->resourcesTree = $this->createTopicTree($topicsRaw);
		$this->resourcesTree = $this->attachPostsToTopicTree($this->resourcesTree, $postsRaw);
	}

	/**
	 * @param \WP_Term[] $topicArray
	 *
	 * @return array
	 */
	private function createTopicTree($topicArray)
	{
		if (empty($topicArray)) return [];
		$topicTree = [];
		$topicArrayCount = count($topicArray);
		for ($i = 0; $i < $topicArrayCount; $i++) {
			if (empty($topicArray[$i]->parent) || $topicArray[$i]->parent === 0) {
				$mainTopicID = $topicArray[$i]->term_id;
				$mainTopic = [
					'topic'                         => $topicArray[$i],
					'subtopics'                     => [],
					$this->treeTestsChildrenID      => [],
					$this->treeTreatmentsChildrenID => [],
				];
				for ($j = 0; $j < $topicArrayCount; $j++) {
					if ($topicArray[$j]->parent === $mainTopicID) {
						$mainTopic['subtopics'][$topicArray[$j]->term_id] = [
							'topic'            => $topicArray[$j],
							$this->treePostsID => [],
						];
					}
				}
				$topicTree[$mainTopicID] = $mainTopic;
			}
		}
		return $topicTree;
	}

	/**
	 * @param array      $topicTree
	 * @param \WP_Post[] $posts
	 *
	 * @return array
	 */
	private function attachPostsToTopicTree($topicTree = [], $posts = [])
	{
		if (empty($posts)) return $topicTree;
		$postsCount = count($posts);
		for ($i = 0; $i < $postsCount; $i++) {
			$postType = (string)$posts[$i]->post_type;
			$topicIDs = get_field($this->resourceTopicFieldID, $posts[$i]->ID);
			if (!is_array($topicIDs)) $topicIDs = [$topicIDs];
			foreach($topicIDs as $topicID) {
				switch ($postType) {
					case $this->resourceTestsID:
						if (!empty($topicTree[$topicID]))
							$topicTree[$topicID][$this->treeTestsChildrenID][] = $posts[$i];
						break;
					case $this->resourceTreatmentsID:
						if (!empty($topicTree[$topicID]))
							$topicTree[$topicID][$this->treeTreatmentsChildrenID][] = $posts[$i];
						break;
					default:
						foreach ($topicTree as &$mainTopic) {
							if (!empty($mainTopic['subtopics'][$topicID])) {
								$mainTopic['subtopics'][$topicID][$this->treePostsID][] = $posts[$i];
							}
						}
						break;
				}
			}
		}
		return $topicTree;
	}

}
