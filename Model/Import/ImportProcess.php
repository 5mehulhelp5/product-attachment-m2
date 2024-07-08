<?php
/**
 * @author Mavenbird Team
 * @copyright Copyright (c) 2020 Mavenbird (https://www.Mavenbird.com)
 * @package Mavenbird_ProductAttachment
 */


namespace Mavenbird\ProductAttachment\Model\Import;

use Mavenbird\Core\Model\Import\Behavior\BehaviorProviderInterface;
use Mavenbird\Core\Model\Import\Mapping\MappingInterface;
use Mavenbird\Core\Model\Import\Validation\EncodingValidator;
use Mavenbird\Core\Model\Import\Validation\ValidatorPoolInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\StringUtils;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;
use Magento\ImportExport\Model\ImportFactory;
use Magento\ImportExport\Model\ResourceModel\Helper;

class ImportProcess extends \Mavenbird\Core\Model\Import\AbstractImport
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var Repository
     */
    private $repository;

    /**
     * Construct
     *
     * @param Registry $registry
     * @param Repository $repository
     * @param [type] $entityTypeCode
     * @param ValidatorPoolInterface $validatorPool
     * @param BehaviorProviderInterface $behaviorProvider
     * @param MappingInterface $mapping
     * @param EncodingValidator $encodingValidator
     * @param StringUtils $string
     * @param ScopeConfigInterface $scopeConfig
     * @param ImportFactory $importFactory
     * @param Helper $resourceHelper
     * @param ProcessingErrorAggregatorInterface $errorAggregator
     * @param ResourceConnection $resource
     * @param array $data
     */
    public function __construct(
        Registry $registry,
        Repository $repository,
        $entityTypeCode,
        ValidatorPoolInterface $validatorPool,
        BehaviorProviderInterface $behaviorProvider,
        MappingInterface $mapping,
        EncodingValidator $encodingValidator,
        StringUtils $string,
        ScopeConfigInterface $scopeConfig,
        ImportFactory $importFactory,
        Helper $resourceHelper,
        ProcessingErrorAggregatorInterface $errorAggregator,
        ResourceConnection $resource,
        array $data = []
    ) {
        parent::__construct(
            $entityTypeCode,
            $validatorPool,
            $behaviorProvider,
            $mapping,
            $encodingValidator,
            $string,
            $scopeConfig,
            $importFactory,
            $resourceHelper,
            $errorAggregator,
            $resource,
            $data
        );
        $this->registry = $registry;
        $this->repository = $repository;
    }

    /**
     * ProcessImport
     *
     * @return void
     */
    public function processImport()
    {
        parent::processImport();
        if ($importId = $this->registry->registry('file_import_id')) {
            $this->repository->deleteById($importId);
        }
    }
}
