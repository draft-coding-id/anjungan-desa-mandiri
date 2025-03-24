<?php

namespace App\Jobs;

use App\Models\Warga;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Codesmiths\LaravelOcrSpace\Enums\Language;
use Codesmiths\LaravelOcrSpace\OcrSpaceOptions;
use Codesmiths\LaravelOcrSpace\Facades\OcrSpace;
use Codesmiths\LaravelOcrSpace\Enums\OcrSpaceEngine;
use Codesmiths\LaravelOcrSpace\ValueObjects\OcrSpaceResponse;

class ScanKtp implements ShouldQueue
{
    use Queueable;
    public $imageUrl;
    public $nik;
    /**
     * Create a new job instance.
     */
    public function __construct($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $options = OcrSpaceOptions::make()
            ->language(Language::English)
            ->OCREngine(OcrSpaceEngine::Engine2);
        $result = OcrSpace::parseImageFile($this->imageUrl, $options);
        $getParsedText = $result->getParsedResults()->first()->getParsedText();
        $lines = explode("\n", $getParsedText);
        $getNik = '';
        foreach ($lines as $line) {
            if (strpos($line, '3206') !== false) {
                $getNik = $line;
                break;
            }
        }
        // remove space and : in getNIk
        $nik = str_replace(' ', '', $getNik);
        $nik = str_replace(':', '', $nik);
        $nik = substr($nik, 0, 16);
        // $this->nik = $nik;
        $this->nik = $nik;
    }
}
