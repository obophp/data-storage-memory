<?php

/**
 * This file is part of the Obo framework for application domain logic.
 * Obo framework is based on voluntary contributions from different developers.
 *
 * @link https://github.com/obophp/data-storage-dibi
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

namespace obo\DataStorage;

class MemoryStorage implements \obo\Interfaces\IDataStorage {

    /** @var array $schema */
    protected $schema = [];

    /** @var array $data */
    protected $data = [];

    /**
     * @param array $schema
     */
    public function __construct(array $schema = []) {
        $this->schema = $schema;
        $this->data = array_fill_keys(array_keys($schema), []);
    }

    /**
     * @param \obo\Carriers\QueryCarrier $queryCarrier
     * @return string
     * @throws \obo\Exceptions\Exception
     */
    public function constructQuery(\obo\Carriers\QueryCarrier $queryCarrier) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

    /**
     * @param \obo\Carriers\QueryCarrier $queryCarrier
     * @throws \obo\Exceptions\Exception
     */
    public function dataForQuery(\obo\Carriers\QueryCarrier $queryCarrier) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

    /**
     * @param \obo\Carriers\QueryCarrier $queryCarrier
     * @param string $primaryPropertyName
     * @throws \obo\Exceptions\Exception
     */
    public function countRecordsForQuery(\obo\Carriers\QueryCarrier $queryCarrier) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

    /**
     * @param \obo\Entity $entity
     * @return void
     */
    public function insertEntity(\obo\Entity $entity) {
        $primaryPropertyValue = $entity->primaryPropertyValue();
        $repositoryName = $entity->entityInformation()->repositoryName;
        $this->data[$repositoryName][$primaryPropertyValue] = (object) $entity->propertiesAsArray($this->schema[$repositoryName]);
    }

    /**
     * @param \obo\Entity $entity
     */
    public function updateEntity(\obo\Entity $entity) {
        $this->insertEntity($entity);
    }

    /**
     * @param \obo\Entity $entity
     */
    public function removeEntity(\obo\Entity $entity) {
        $primaryPropertyValue = $entity->primaryPropertyValue();
        $repositoryName = $entity->entityInformation()->repositoryName;
        unset($this->data[$repositoryName][$primaryPropertyValue]);
    }

    /**
     * @param \obo\Carriers\QueryCarrier $specification
     * @param string $repositoryName
     * @param \obo\Entity $owner
     * @param string $targetEntity
     * @return int
     */
    public function countEntitiesInRelationship(\obo\Carriers\QueryCarrier $specification, $repositoryName, \obo\Entity $owner, $targetEntity) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

    /**
     * @param \obo\Carriers\QueryCarrier $specification
     * @param string $repositoryName
     * @param \obo\Entity $owner
     * @param string $targetEntity
     * @return array
     */
    public function dataForEntitiesInRelationship(\obo\Carriers\QueryCarrier $specification, $repositoryName, \obo\Entity $owner, $targetEntity) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

    /**
     * @param string $repositoryName
     * @param array $entities
     * @throws \obo\Exceptions\Exception
     */
    public function createRelationshipBetweenEntities($repositoryName, array $entities) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

    /**
     * @param string $repositoryName
     * @param array $entities
     * @throws \obo\Exceptions\Exception
     */
    public function removeRelationshipBetweenEntities($repositoryName, array $entities) {
        throw new \obo\Exceptions\Exception("Not implemented yet");
    }

}
