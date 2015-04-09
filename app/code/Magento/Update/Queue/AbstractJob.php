<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Update\Queue;

use \Magento\Update\Status;

/**
 * Magento updater application abstract job.
 */
abstract class AbstractJob
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var \Magento\Update\Status
     */
    protected $jobStatus;

    /**
     * Initialize job instance.
     *
     * @param string $name
     * @param array $params
     * @param \Magento\Update\Status|null $jobStatus
     */
    public function __construct($name, $params, \Magento\Update\Status $jobStatus = null)
    {
        $this->name = $name;
        $this->params = $params;
        $this->jobStatus = $jobStatus ? $jobStatus : new Status();
    }

    /**
     * Get job name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get string representation of a job.
     *
     * @return string
     */
    public function __toString()
    {
        return '<' . $this->name . '>' . json_encode($this->params);
    }

    /**
     * Execute job.
     *
     * @return $this
     * @throws \RuntimeException
     */
    abstract public function execute();
}