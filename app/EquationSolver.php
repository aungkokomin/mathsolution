<?php

namespace App;

use App\Models\EquationSolution;

class EquationSolver {
    private $letters;
    private $solutions;
    private $iterations;

    public function solve() {
        // Initialize variables
        $this->iterations = 0;
        $this->letters = ['H', 'I', 'E', 'R', 'G', 'B', 'T', 'S', 'N', 'U'];
        $this->solutions = [];

        // Generate permutations of digits 0-9
        $digits = range(0, 9);
        $permutations = $this->getPermutations($digits, count($this->letters));

        // Loop all the permutations and generate all possible solutions
        foreach ($permutations as $permutation) {
            $this->iterations++;

            // Map letters to digits using current permutation
            $mapping = array_combine($this->letters, $permutation);

            // Apply mathematical rules to reduce iterations
            if ($mapping['H'] === 0 || $mapping['G'] === 0 || $mapping['E'] === 0 || $mapping['N'] === 0) {
                // Skip if any of the starting letters is mapped to 0
                continue;
            }

            // Calculate the numbers for the equation
            $hier = $this->getNumber('HIER', $mapping);
            $gibt = $this->getNumber('GIBT', $mapping);
            $es = $this->getNumber('ES', $mapping);
            $neues = $this->getNumber('NEUES', $mapping);

            // Check if the equation is satisfied
            if ($hier + $gibt + $es === $neues) {
                // Store the solution
                $this->solutions[] = [
                    'HIER' => $hier,
                    'GIBT' => $gibt,
                    'ES' => $es,
                    'NEUES' => $neues
                ];
            }
        }

        // Output the results
        $solutionCount = count($this->solutions);
        $response = [];
        $response['Iterations'] = $this->iterations;
        $response['solutionCount'] = $solutionCount;

        if ($solutionCount > 0) {
            foreach ($this->solutions as $solution) {
                $response['solutions'][] = [
                    'HIER'  => $solution['HIER'],
                    'GIBT'  => $solution['GIBT'],
                    'ES'    => $solution['ES'],
                    'NEUES' => $solution['NEUES']
                ];
            }
        }
        return $response;
    }

    private function getNumber($word, $mapping) {
        // Convert a word to a number based on the mapping of letters to digits
        $number = '';
        for ($i = 0; $i < strlen($word); $i++) {
            $letter = $word[$i];
            $number .= $mapping[$letter];
        }
        return intval($number);
    }

    private function getPermutations($items, $length) {
        // Generate permutations of items with a given length
        $permutations = [];
        $this->generatePermutations($items, $length, $permutations);
        return $permutations;
    }

    private function generatePermutations($items, $length, &$permutations, $current = []) {
        // Recursive function to generate permutations using backtracking
        if ($length === 0) {
            $permutations[] = $current;
            return;
        }

        foreach ($items as $item) {
            if (!in_array($item, $current, true)) {
                $this->generatePermutations($items, $length - 1, $permutations, array_merge($current, [$item]));
            }
        }
    }
}

