<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(normalizationContext:['groups'=>['ingredient:recipe']]),
        new Post(),
        new Put(),
        new Patch()
    ],
    paginationItemsPerPage:15
)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ApiFilter(SearchFilter::class,strategy: SearchFilter::STRATEGY_PARTIAL)]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Groups(['ingredient:recipe'])]
    #[ORM\ManyToMany(targetEntity: Recipe::class, inversedBy: 'ingredients')]
    private Collection $recipes;

    #[ORM\ManyToMany(targetEntity: Quantity::class, inversedBy: 'ingredient')]
    private Collection $quantities;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
        $this->quantities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Recipe>
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): static
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): static
    {
        $this->recipes->removeElement($recipe);

        return $this;
    }

    /**
     * @return Collection<int, Recipe>
     */
    public function getQuantites(): Collection
    {
        return $this->quantities;
    }

    public function addQuantity(Quantity $quantity): static
    {
        if (!$this->quantities->contains($quantity)) {
            $this->quantities->add($quantity);
        }

        return $this;
    }

    public function removeQuantity(Quantity $quantity): static
    {
        $this->quantities->removeElement($quantity);

        return $this;
    }
}
