<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetBuckets
 * Elasticsearch API name ml.get_buckets
 *
 * NOTE: this file is autogenerated using util/GenerateEndpoints.php
 * and Elasticsearch 7.13.0-SNAPSHOT (9edb1516048996db4dcb6b56ab1851e869bce76b)
 */
class GetBuckets extends AbstractEndpoint
{
    protected $job_id;
    protected $timestamp;

    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new RuntimeException(
                'job_id is required for get_buckets'
            );
        }
        $job_id = $this->job_id;
        $timestamp = $this->timestamp ?? null;

        if (isset($timestamp)) {
            return "/_ml/anomaly_detectors/$job_id/results/buckets/$timestamp";
        }
        return "/_ml/anomaly_detectors/$job_id/results/buckets";
    }

    public function getParamWhitelist(): array
    {
        return [
            'expand',
            'exclude_interim',
            'from',
            'size',
            'start',
            'end',
            'anomaly_score',
            'sort',
            'desc'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): GetBuckets
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setJobId($job_id): GetBuckets
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setTimestamp($timestamp): GetBuckets
    {
        if (isset($timestamp) !== true) {
            return $this;
        }
        $this->timestamp = $timestamp;

        return $this;
    }
}
