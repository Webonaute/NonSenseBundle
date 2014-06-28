<?php
/* This file is part of the Webonaute package.
 *
 * (c) Mathieu Delisle <mdelisle@webonaute.ca>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Webonaute\NonSenseBundle\Service;

/**
 * Class NonSenseService
 *
 * @package EXS\NonSenseBundle\Service
 * @author Mathieu Delisle <mdelisle@webonaute.ca>
 * @author Chris Throup - Maintainer
 * @author Jeff Holman - Original author
 */
class NonSenseService
{

    /**
     * DB directory path.
     *
     * @var string
     */
    protected $dbpath;

    /**
     * @var array
     */
    protected $lists
        = array(
            "interjections",
            "determiners",
            "adjectives",
            "nouns",
            "adverbs",
            "verbs",
            "prepositions",
            "conjunctions",
            "comparatives"
        );

    /**
     * @var array
     */
    protected $vowels = array('a', 'e', 'i', 'o', 'u');

    /**
     * @var array
     */
    protected $wordlists = array();

    /**
     * @var string
     */
    protected $output;

    /**
     * Constructor
     *
     * @param string $dbpath Path to the Database.
     *
     * @throws \Exception
     */
    public function __construct($dbpath = '')
    {
        if ($dbpath == '') {
            $dbpath = realpath(dirname(__FILE__) . "/../Resources/db/");
        }

        if (!is_dir($dbpath)) {
            throw new \Exception("Directory not found. ($dbpath)");
        }

        $this->dbpath = $dbpath;
    }

    /**
     * Load DB if not already loaded.
     */
    public function loadDB()
    {
        if (empty($this->wordlists)) {
            foreach ($this->lists as $part) {
                $this->wordlists[$part] = file($this->dbpath . "/$part.txt");
            }
        }

        return true;
    }

    public function sentence($numSentences = 1)
    {
        $this->loadDB();

        $type = mt_rand(0, 1);

        for ($i = 0; $i < 2; $i++) {
            foreach ($this->lists as $part) {
                ${$part}[$i] = trim($this->wordlists[$part][mt_rand(0, count($this->wordlists[$part]) - 1)]);
            }

            if ($determiners[$i] == "a") {
                foreach ($this->vowels as $vowel) {
                    if (($type && ($adjectives[$i][0] == $vowel)) || (!$type && ($nouns[$i][0] == $vowel))) {
                        $determiners[$i] = "an";
                    }
                }
            }
        }

        $sentence = ($type
            ?
            "$interjections[0], $determiners[0] $adjectives[0] $nouns[0] $adverbs[0] $verbs[0] $prepositions[0] $determiners[1] $adjectives[1] $nouns[1]."
            :
            "$interjections[0], $determiners[0] $nouns[0] is $comparatives[0] $adjectives[0] than $determiners[1] $adjectives[1] $nouns[1].");

        if ($numSentences > 1) {
            $sentence .= " " . $this->sentence($numSentences - 1);
            $this->output = $sentence;
            return $this->output;
        }
        return $sentence;
    }

    public function word($numWords = 1)
    {
        $this->loadDB();

        $word_list = '';

        for ($count = 1; $count <= $numWords; $count++) {
            if ($count > 1) {
                $word_list .= ' ';
            }
            $list_to_use = mt_rand(0, sizeof($this->wordlists) - 1);
            $word_to_use = mt_rand(0, sizeof($this->wordlists[$this->lists[$list_to_use]]) - 1);

            $word = $this->wordlists[$this->lists[$list_to_use]][$word_to_use];

            if (strpos($word, ' ')) {
                $word = substr_replace($word, '', strpos($word, ' '));
            }

            $word = trim($word);
            $word_list .= strtolower($word);
        }
        $this->output = $word_list;
        return $this->output;
    }
}