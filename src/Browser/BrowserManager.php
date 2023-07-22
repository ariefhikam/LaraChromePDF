<?php

namespace ariefhikam\LaraChromePdf\Browser;

use HeadlessChromium\BrowserFactory;

class BrowserManager {

    public $browser;
    public $page;

    public function start()
    {
        try {
            $browserFactory = new BrowserFactory();
            $this->browser = $browserFactory->createBrowser();
            $this->page = $browser->createPage();
        } finally {
            $browser->close();
        }
    }

    public function createPdf($location, $options)
    {
        $this->page
             ->pdf($options)
             ->saveToFile($location);
    }

    public function navigate($location)
    {
        $this->page
             ->navigate($location)
             ->waitForNavigation();
    }
}

