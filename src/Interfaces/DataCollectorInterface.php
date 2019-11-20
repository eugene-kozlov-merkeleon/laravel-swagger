<?php

namespace EugMerkeleon\Support\AutoDoc\Interfaces;

interface DataCollectorInterface
{
    /**
     * Get production documentation
     */
    public function getDocumentation();

    /**
     * Get temporary data
     */
    public function getTmpData();

    /**
     * Save production data
     */
    public function saveData();

    /**
     * Save temporary data
     *
     * @param array $data
     */
    public function saveTmpData($data);
}


