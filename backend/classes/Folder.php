<?php
final class Folder {
    private $name;
    private $links;

    public function __construct($name) {
        $this->name = $name;
        $this->links = array();
    }

    public function addLink($link) {
        if($link != null){
            $this->links[] = $link;
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getArrayLength() {
        return count($this->links);
    }

    public function getLinks() {
        return $this->links;
    }
}