<?php


namespace Karis\Bundle\ServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Karis\Bundle\ServiceBundle\Controller\Configuration;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of RessourceController
 *
 * @author marouentabbabi
 */
class RessourceController extends FOSRestController{
    
  
       /**
        * @var Configuration
        */
       protected $config;
       
    public function __construct(Configuration $config)
    {
        
       $this->conf = $config;
    }
    
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);

        
    }


    public function getConfiguration()
    {
        return $this->config;
    }
    
    /**
     * @param object|null $ressource
     *
     * @return FormInterface
     */
    public function getForm($ressource = null)
    {
       return $this->createForm($this->config->getFormType(), $ressource);
    }
    
    /**
     * @param string $name
     * 
     * @return EntityRepository
     */
    public function getRepository($name)
    {
        return $this->container->get('doctrine')->getRepository($this->config->getTemplateNamespace($name));
    }
    
   
    
}
