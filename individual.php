<?php

abstract class TransportFactory
{
    abstract public function createTransport(): Transport;

    public function startDelivering(): void
    {
        $transport = $this->createTransport();
        $price = $this->calculatePrice($transport->getPricePerKm(), $transport->getKm());
        $transport->deliver($price);
    }

    private function calculatePrice(int $pricePerKm, int $km)
    {
        return $pricePerKm * $km;
    }
}


interface Transport
{
    public function getPricePerKm(): int;
    public function getKm(): int;
    public function deliver($price): void;
}

class CreateTruckFactory extends TransportFactory
{
    private int $pricePerKm;
    private int $km;

    public function __construct(int $pricePerKm, int $km)
    {
        $this->pricePerKm = $pricePerKm;
        $this->km = $km;
    }

    public function createTransport(): Transport
    {
        return new Truck($this->pricePerKm, $this->km);
    }
}

class Truck implements Transport
{
    private int $pricePerKm;

    private int $km;
    public function __construct(int $pricePerKm, int $km)
    {
        $this->pricePerKm = $pricePerKm;
        $this->km = $km;
    }
    public function getPricePerKm(): int
    {
        return $this->pricePerKm;
    }

    public function getKm(): int
    {
        return $this->km;
    }
    public function deliver($price): void
    {
        echo "Using Truck. Price per km: $$this->pricePerKm";
        echo "\n";
        echo "Total: $this->km km.";
        echo "\n";
        echo "We start deliver. Total price = $$price";
    }
}

class CreateShipFactory extends TransportFactory
{
    private int $pricePerKm;
    private int $km;
    public function __construct(int $pricePerKm, int $km)
    {
        $this->pricePerKm = $pricePerKm;
        $this->km = $km;
    }
    public function createTransport(): Transport
    {
        return new Ship($this->pricePerKm, $this->km);
    }
}

class Ship implements Transport
{
    private int $pricePerKm;
    private int $km;
    public function __construct(int $pricePerKm, int $km)
    {
        $this->pricePerKm = $pricePerKm;
        $this->km = $km;
    }
    public function getPricePerKm(): int
    {
        return $this->pricePerKm;
    }

    public function getKm(): int
    {
        return $this->km;
    }
    public function deliver($price): void
    {
        echo "Using Ship. Price per km: $$this->pricePerKm";
        echo "\n";
        echo "Total: $this->km km.";
        echo "\n";
        echo "We start deliver. Total price = $$price";
    }
}

class CreatePlaneFactory extends TransportFactory
{
    private int $pricePerKm;
    private int $km;
    public function __construct(int $pricePerKm, int $km)
    {
        $this->pricePerKm = $pricePerKm;
        $this->km = $km;
    }
    public function createTransport(): Transport
    {
        return new Plane($this->pricePerKm, $this->km);
    }
}

class Plane implements Transport
{
    private int $pricePerKm;
    private int $km;
    public function __construct(int $pricePerKm, int $km)
    {
        $this->pricePerKm = $pricePerKm;
        $this->km = $km;
    }
    public function getPricePerKm(): int
    {
        return $this->pricePerKm;
    }

    public function getKm(): int
    {
        return $this->km;
    }
    public function deliver($price): void
    {
        echo "Using Plane. Price per km: $$this->pricePerKm";
        echo "\n";
        echo "Total: $this->km km.";
        echo "\n";
        echo "We start deliver. Total price = $$price";
    }
}


function startCode(TransportFactory $transportFactory): void
{
    $transportFactory->startDelivering();
}

startCode(new CreateTruckFactory(50, 500));
echo "\n\n";

startCode(new CreateShipFactory(20, 5000));
echo "\n\n";

startCode(new CreatePlaneFactory(100, 250));
echo "\n\n";