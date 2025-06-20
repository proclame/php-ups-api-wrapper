<?php

namespace RahulGodiyal\PhpUpsApiWrapper\Entity;

class ShipTo
{
    private ?string $name;
    private string $attentionName = "";
    private string $email = "";
    private Phone $phone;
    private Address $address;
    private string $residential = "";

    public function __construct()
    {
        $this->phone = new Phone();
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAttentionName(string $attn_name): self
    {
        $this->attentionName = $attn_name;
        return $this;
    }

    public function getAttentionName(): string
    {
        return $this->attentionName;
    }

    public function setPhone(Phone $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setResidential(string $residential): self
    {
        $this->residential = $residential;
        return $this;
    }

    public function getResidential(): string
    {
        return $this->residential;
    }

    public function toArray(): array
    {
        $shipTo = [
            "Name" => $this->name,
            "Address" => $this->address->toArray()
        ];

        if ($this->attentionName) {
            $shipTo["AttentionName"] = $this->attentionName;
        }

        if ($this->phone->exists()) {
            $shipTo["Phone"] = $this->phone->toArray();
        }

        if ($this->email) {
            $shipTo["EmailAddress"] = $this->email;
        }

        if ($this->residential) {
            $shipTo["Residential"] = $this->residential;
        }

        return $shipTo;
    }
}
