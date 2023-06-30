<?php

class Solution {
    /**
     * @param Integer[] $jobs
     * @param Integer $k
     * @return Integer
     */
    private $jobs;
    private $k;
    private $result;
    function minimumTimeRequired($jobs, $k) {
        $this->jobs = $jobs;
        $this->k = $k;
        $this->result = max(jobs);
        $this->backtrack(0, array_fill(0, $k, 0), 0);
        return $this->result;
    }
    function backtrack($index, $workers, $maxTime) {
        if ($maxTime >= $this->result) {
            return;
        }
        if ($index === count($this->jobs)) {
            $this->result = $maxTime;
            return;
        }
        for ($i = 0; $i < $this->k; $i++) {
            $workers[$i] += $this->jobs[$index];
            $this->backtrack($index + 1, $workers, max($maxTime, $workers[$i]));
            $workers[$i] -= $this->jobs[$index];
            if ($workers[$i] === 0) {
                break;
            }
        }
    }
}