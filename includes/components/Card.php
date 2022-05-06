<?php

class Card {

    private $product;
    private $brand;
    private $dose;
    private $animal;
    private $image;

    public function __construct(string $product, string $brand, int $dose, string $animal, string $image) {

        // si un des champs est null il est égal à "--".
        if ($product === null) {
            $product = "--";
        }
        if ($brand === null) {
            $brand = "--";
        }

        $this->product = $product;
        $this->brand = $brand;
        $this->dose = $dose;
        $this->animal = $animal;
        $this->image = $image;
    }

    public function getProduct(): string {
        return $this->product;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getDose(): int {
        return $this->dose;
    }

    public function getAnimal(): string {
        return $this->animal;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function toString(): string {
        return $this->product . " " . $this->brand . " " . $this->dose . " " . $this->animal . " " . $this->image;
    }
}
