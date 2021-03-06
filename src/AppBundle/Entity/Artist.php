<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

use Algolia\AlgoliaSearchBundle\Mapping\Annotation as Algolia;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Artist
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ArtistRepository")
 * @UniqueEntity("email")
 */
class Artist
{
    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * 
     * @Algolia\Attribute
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     *
     * @Algolia\Attribute
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="caption", type="string", length=255, unique=true)
     *
     * @Algolia\Attribute
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="image_base_url", type="string", length=255, nullable=true)
     */
    private $imageBaseUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="image_default", type="string", length=255, nullable=true)
     */
    private $imageDefault;

    /**
     * @var integer
     *
     * @ORM\Column(name="itunes_artist_id", type="integer", nullable=true)
     *
     * @Algolia\Attribute
     */
    private $itunesArtistId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     *
     * @Algolia\Attribute
     */
    private $description;


    /**
     * @ManyToMany(targetEntity="Tag")
     * @JoinTable(name="artists_tags",
     *      joinColumns={@JoinColumn(name="artist_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     **/
    private $tags;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set caption
     *
     * @param string $name
     *
     * @return Artist
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }


    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Artist
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set imageBaseUrl
     *
     * @param string $imageBaseUrl
     *
     * @return Artist
     */
    public function setImageBaseUrl($imageBaseUrl)
    {
        $this->imageBaseUrl = $imageBaseUrl;

        return $this;
    }

    /**
     * Get imageBaseUrl
     *
     * @return string
     */
    public function getImageBaseUrl()
    {
        return $this->imageBaseUrl;
    }

    /**
     * Set imageDefault
     *
     * @param string $imageDefault
     *
     * @return Artist
     */
    public function setImageDefault($imageDefault)
    {
        $this->imageDefault = $imageDefault;

        return $this;
    }

    /**
     * Get imageDefault
     *
     * @return string
     */
    public function getImageDefault()
    {
        return $this->imageDefault;
    }

    /**
     * Set itunesArtistId
     *
     * @param integer $itunesArtistId
     *
     * @return Artist
     */
    public function setItunesArtistId($itunesArtistId)
    {
        $this->itunesArtistId = $itunesArtistId;

        return $this;
    }

    /**
     * Get itunesArtistId
     *
     * @return integer
     */
    public function getItunesArtistId()
    {
        return $this->itunesArtistId;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Artist
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Post
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
