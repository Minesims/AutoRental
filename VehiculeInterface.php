<?php
declare(strict_types=1);

interface VehiculeInterface 
{
    /**
     * Retourne l'immatriculation du véhicule.
     * @return string
     */
    public function getImmatriculation(): string;

    /**
     * Calcule et retourne le prix de la location journalière.
     * @return float
     */
    public function calculerTarifJournalier(): float;

    /**
     * Retourne le statut de disponibilité (true = disponible, false = loué).
     * @return bool
     */
    public function estDisponible(): bool;

    /**
     * Change le statut de disponibilité du véhicule.
     * @param bool $statut
     * @return void
     */
    public function setDisponibilite(bool $statut): void;
}
?>