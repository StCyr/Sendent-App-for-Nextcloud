<?php

namespace OCA\Sendent\Controller;

use OCP\IRequest;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\SystemTag\ISystemTag;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\TagAlreadyExistsException;
use OCP\SystemTag\TagNotFoundException;

class TagController extends Controller {

	/** @var ISystemTagManager */
	private $tagManager;

	public function __construct($appName, IRequest $request, ISystemTagManager $tagManager) {
		parent::__construct($appName, $request);
		$this->tagManager = $tagManager;
	}

	public function show(string $id) {
		try {
			$tags = $this->tagManager->getTagsByIds($id);
		} catch (TagNotFoundException $e) {
			return new JSONResponse([], Http::STATUS_NOT_FOUND);
		}

		return new JSONResponse($this->serializeTag($tags[$id]));
	}

	public function create(string $name) {
		try {
			$tag = $this->tagManager->createTag($name, true, false);
		} catch (TagAlreadyExistsException $e) {
			$tag = $this->tagManager->getTag($name, true, false);
		}

		return new JSONResponse($this->serializeTag($tag));
	}

	private function serializeTag(ISystemTag $tag) {
		return [
			"id" => (int)$tag->getId(),
			"name" => $tag->getName(),
			"isVisible" => $tag->isUserVisible(),
			"isAssignable" => $tag->isUserAssignable(),
		];
	}
}
