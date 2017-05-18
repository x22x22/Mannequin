<?php


namespace LastCall\Mannequin\Html\Discovery;


use LastCall\Mannequin\Core\Discovery\DiscoveryInterface;
use LastCall\Mannequin\Core\Metadata\MetadataFactoryInterface;
use LastCall\Mannequin\Core\Pattern\PatternCollection;
use LastCall\Mannequin\Html\Pattern\HtmlPattern;
use Symfony\Component\Finder\Finder;

class HtmlDiscovery implements DiscoveryInterface {

  private $finder;
  private $metadataFactory;
  private $prefix;

  public function __construct(Finder $finder, MetadataFactoryInterface $metadataFactory, $prefix = 'html://') {
    $this->finder = $finder;
    $this->metadataFactory = $metadataFactory;
    $this->prefix = $prefix;
  }

  public function discover(): PatternCollection {
    $patterns = [];
    foreach($this->finder as $fileInfo) {
      $patterns[] = $this->parsePattern($fileInfo);
    }
    return new PatternCollection($patterns);
  }

  protected function parsePattern(\SplFileInfo $fileInfo) {
    $pattern = new HtmlPattern($this->prefix.$fileInfo->getRelativePathname(), $fileInfo);

    if($this->metadataFactory->hasMetadata($pattern)) {
      $metadata = $this->metadataFactory->getMetadata($pattern);
      $pattern->setName($metadata['name']);
      $pattern->setVariables($metadata['variables']);
      $pattern->setTags($metadata['tags']);
    }
    return $pattern;
  }
}