<?php

namespace App\Services\Contracts;

interface FrontendInterface
{
    /**
     * Get all data for frontend
     *
     * @return array
     */
    public function getAllData();
    
    /**
     * Get all publications
     *
     * @return array
     */
    public function getAllPublications();

    /**
     * Get all projects
     *
     * @return array
     */
    public function getAllProjects();
}
