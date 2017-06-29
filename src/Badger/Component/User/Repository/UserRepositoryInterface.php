<?php

namespace Badger\Component\User\Repository;

use Badger\Component\Game\Model\TagInterface;

/**
 * @author  Adrien Pétremann <hello@grena.fr>
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
interface UserRepositoryInterface
{
    /**
     * @return int
     */
    public function countAll();

    /**
     * @param string $order
     * @param int    $limit
     *
     * @return array
     */
    public function getSortedUserByUnlockedBadges($order = 'DESC', $limit = 7);

    /**
     * @return array
     */
    public function getAllUsernames();

    /**
     * Return all new users for the given $month & $year.
     *
     * @param string $month
     * @param string $year
     *
     * @return array
     */
    public function getNewUsersForMonth($month, $year);

    /**
     * Return the user who unlocked the most badges for given $month & $year, in the given $tag.
     * $nbOfBadges is an array, with number of badges of the podium. Example:
     *
     * getMonthlyBadgeChampions('02', '1990', $tag, [4, 2, 1]) =>
     * 4 badges: John, Lannister
     * 2 badges: Mary, Ulric
     * 1 badge: Thrall
     *
     * @param string $month
     * @param string $year
     * @param TagInterface $tag
     * @param array $nbOfBadges
     *
     * @return mixed
     */
    public function getMonthlyBadgeChampions($month, $year, TagInterface $tag, array $nbOfBadges);
}
