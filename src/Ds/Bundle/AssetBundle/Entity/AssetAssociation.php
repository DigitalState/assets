<?php

namespace Ds\Bundle\AssetBundle\Entity;

use Ds\Component\Association\Entity\Association;
use Ds\Bundle\AssetBundle\Attribute\Accessor;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as ORMAssert;

/**
 * Class AssetAssociation
 *
 * @ApiResource(
 *      attributes={
 *          "filters"={"ds.asset_association.search", "ds.asset_association.date", "ds.asset_association.order"},
 *          "normalization_context"={
 *              "groups"={"association_output"}
 *          },
 *          "denormalization_context"={
 *              "groups"={"association_input"}
 *          }
 *      }
 * )
 * @ORM\Entity(repositoryClass="Ds\Bundle\AssetBundle\Repository\AssetAssociationRepository")
 * @ORM\Table(name="ds_asset_assoc")
 */
class AssetAssociation extends Association
{
    use Accessor\Asset;

    /**
     * @var \Ds\Bundle\AssetBundle\Entity\Asset
     * @ApiProperty
     * @Serializer\Groups({"association_output", "association_input"})
     * @ORM\ManyToOne(targetEntity="Ds\Bundle\AssetBundle\Entity\Asset", inversedBy="associations")
     * @ORM\JoinColumn(name="asset_id", referencedColumnName="id")
     * @Assert\Valid
     */
    protected $asset;
}