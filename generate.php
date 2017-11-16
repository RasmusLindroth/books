<?php
class Book {
    public function __construct($path) {
        $this->path = $path;
        $this->mobiPath = $this->_getMobiPath();
        $this->imgPath = $this->_getImgPath();
        $this->title = null;
        $this->creator = null;
        $this->description = null;
        $this->publisher = null;
        $this->language = null;

        $this->_loadBook();
    }

    private function _getMobiPath() {
        return substr($this->path, 0, -3) . 'mobi';
    }

    private function _getImgPath() {
        return substr($this->path, 0, -3) . 'jpg';
    }

    private function _loadBook() {
        $file = file_get_contents($this->path);

        $opf = new SimpleXMLElement($file);
        $meta = $opf->metadata->children('dc', true);
        $data = ['title', 'creator', 'description', 'publisher', 'language'];
        foreach($data as $value) {
            if(!empty($meta->{$value})) {
                $this->{$value} = (string) strip_tags($meta->{$value});
            }
        }
    }
}

function getBooks($path) {
    $opfs = glob($path . '*.opf');
    $folders = glob($path . '*', GLOB_MARK|GLOB_ONLYDIR);

    foreach($folders as $folder) {
        $opfs = array_merge($opfs, getBooks($folder));
    }

    return $opfs;
}

$opfs = getBooks('./media/');

$books = array_map(function($opf) {
    return new Book($opf);
}, $opfs);

$json = json_encode($books);
$fh = fopen('books.json', 'w+');
fwrite($fh, $json);
fclose($fh);