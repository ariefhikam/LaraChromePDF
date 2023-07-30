<?php

namespace ariefhikam\LaraChromePdf;

use Illuminate\Support\Str;
use Ariefhikam\LaraChromePdf\Browser\BrowserManager;

class LaraChromePdf {

    protected BrowserManager $browser;
    public String $temporaryName;
    public String $temporaryHtml;
    public String $temporaryPdf;

    public function __construct()
    {
        $this->browser = new BrowserManager;
    }

    public function view($location, $data = [])
    {
        $html = view($location)
            ->with($data)
            ->render();

        $this->temporaryHtml = $this->createTemporaryHtml($html);

        return $this;
    }

    public function html($html)
    {
        $this->temporaryHtml = $this->createTemporaryHtml($html);

        return $this;
    }

    public function url() {}

    public function download()
    {
        $tempFolder = config('chrome-pdf.pdf.temporary_folder');
        $this->temporaryPdf = 'temp-chrome-pdf-'. $this->temporaryName . '.pdf';
        $this->browser
             ->start()
             ->navigate('file://'. $this->temporaryHtml)
             /* ->screenshot($tempFolder. '/' .$this->temporaryPdf); */
             ->createPdf($tempFolder . '/' .$this->temporaryPdf, [
                /* 'landscape'           => true, */
                'printBackground'     => true,
                'displayHeaderFooter' => true,
                'preferCSSPageSize'   => true,
                /* 'marginTop'           => 1.4, */
                /* 'marginBottom'        => 1.4, */
                /* 'marginLeft'          => 5.0, */
                /* 'marginRight'         => 4.0, */
                'paperWidth'          => 6.0,
                'paperHeight'         => 6.0,
                'scale'               => 1.2,
             ]);
        $this->browser->stop();
    }

    public function inline() {}
    public function save() {}
    public function landscape() {}
    public function potrait() {}
    public function noBackground() {}
    public function size($width, $height) {}
    public function margin($width, $height) {}
    public function scale() {}
    public function header() {}
    public function footer() {}

    protected function createTemporaryHtml($html)
    {
        $this->createTemporaryName();

        $filename = "temp-chrome-pdf-" . $this->temporaryName . ".html";
        $tempFolder = config('chrome-pdf.pdf.temporary_folder');
        $location = $tempFolder . "/" . $filename;

        file_put_contents($location, $html);

        return $location;
    }

    protected function createTemporaryName()
    {
        $this->temporaryName = Str::random(20);

        return $this;
    }

}

