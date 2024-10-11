<?php

namespace App\Repositories;

use App\Models\TaxBand;
use Illuminate\Database\Eloquent\Collection;

class TaxBandRepository
{
    public function create(array $data): TaxBand
    {
        return TaxBand::create($data);
    }

    public function update(TaxBand $taxBand, array $data): void
    {
        $taxBand->update($data);
    }

    public function delete(TaxBand $taxBand): void
    {
        $taxBand->delete();
    }

    public function getLatest(): TaxBand
    {
        return TaxBand::latest()->first();
    }

    public function getTaxBandsByThreshold(int $threshold): Collection
    {
        return TaxBand::query()
            ->where('threshold', '<=', $threshold)
            ->orderBy('id', 'desc')
            ->get();
    }
}
