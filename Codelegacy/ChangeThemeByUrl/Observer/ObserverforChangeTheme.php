<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\ChangeThemeByUrl\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\View\DesignInterface;
use Magento\Store\Model\StoreManagerInterface; 
use Magento\Framework\App\Request\Http;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class ObserverforChangeTheme implements ObserverInterface
{

    protected $design;
    protected $storeManager;
	protected $request;
	protected $logger;

    public function __construct(
        DesignInterface $design,
		StoreManagerInterface $storeManager,	
		Http $request,
		LoggerInterface $logger
	) {
        $this->design       = $design;
        $this->storeManager = $storeManager;
		$this->request      = $request;
		$this->logger       = $logger;
	}

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
		$controller = $observer->getControllerAction();
		//$this->logger->info($this->request->getFullActionName());
		// used checkout as example
		if($this->request->getFullActionName() == 'checkout_index_index') {
			$this->design->setDesignTheme(THEME_SYSTEM_ID); // Theme id
        }
	}

}
