<?php

namespace Ariefhikam\LaraChromePdf\Browser;

use HeadlessChromium\BrowserFactory;

class BrowserManager {

    public $browser;
    public $page;

    public function start()
    {
        try {
            $browserFactory = new BrowserFactory(
                config('chrome-pdf.browser.binnary')
            );

            $this->browser = $browserFactory->createBrowser([
                'windowSize' => config('chrome-pdf.browser.size'),
                'noSandbox' => !config('chrome-pdf.browser.sandbox'),
                'debugLogger' => 'php://stdout',
            ]);

            $this->page = $this->browser->createPage();
        } catch (\Exception $err) {
            throw($err);

            $this->browser->close();
        }

        return $this;
    }

    public function screenshot($location)
    {
        $this->page
             ->screenshot()
             ->saveToFile($location);


        dd($location);

         return $location;
    }

    public function createPdf($location, $options)
    {
        $this->page
             ->pdf($options)
             ->saveToFile($location);

        return $location;
    }

    public function navigate($location)
    {
        $this->page
             ->navigate($location)
             ->waitForNavigation();

        return $this;
    }

    public function stop()
    {
        $this->browser->close();
    }
}

