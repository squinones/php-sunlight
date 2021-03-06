<?php
/**
 * Bills.php - Congress API Wrapper
 *
 * The API Wrapper provides an interface to construct Sunlight Foundation Congress API queries.
 *
 * @link           https://sunlightlabs.github.io/congress/bills.html
 *
 * @author         Samantha Quinones <samantha@tembies.com>
 * @package        Sunlight\Congress
 * @copyright      2013 Samantha Quiñones
 * @license        MIT (For the full copyright and license information, please view the LICENSE
 *                 file that was distributed with this source code.)
 */
namespace Squinones\Sunlight\Congress;


use Squinones\Sunlight\Congress\Api\ApiWrapper;
use Squinones\Sunlight\Congress\Containers\Filter;

class Bills extends ApiWrapper
{
    protected $url = "https://congress.api.sunlightfoundation.com/bills";

    /**
     * Convenience method to query the /search subordinate endpoint (full-text searching)
     *
     * @link https://sunlightlabs.github.io/congress/bills.html
     *
     * @param $query
     *
     * @return Api\ApiResponse
     */
    public function locate($query)
    {
        // Clone the wrapper
        $bills = clone $this;

        // Create an empty filter
        $filter = new Filter();

        $bills->setUrl($this->getUrl() . "/search");

        // Set the filter
        $bills->filter($filter);

        // Run the find method
        return $bills->filter($filter)->find($query);
    }
}
