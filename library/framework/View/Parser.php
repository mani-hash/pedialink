<?php

namespace Library\Framework\View;

trait Parser
{
    /**
     * Replace directives that take a parenthesized expression (e.g. @if(...))
     * using a proper parenthesis-matching search so nested parentheses work.
     *
     * @param string $subject
     * @param string $directive (e.g. 'if', 'elseif', 'foreach')
     * @param callable $callback function(string $expression): string
     * @return string
     */
    private function replaceDirectiveWithBalancedParens(string $subject, string $directive, callable $callback): string
    {
        $offset = 0;
        $needle = '@' . $directive;

        while (($pos = strpos($subject, $needle, $offset)) !== false) {
            // find first '(' after the directive name
            $openPos = strpos($subject, '(', $pos);
            if ($openPos === false) {
                // if no parenthesis then skip this occurrence
                $offset = $pos + strlen($needle);
                continue;
            }

            // ensure that between '@directive' and '(' 
            // there are only spaces (so we don't match '@directiveSomething(')
            $between = substr(
                $subject,
                $pos + strlen($needle),
                $openPos - ($pos + strlen($needle))
            );

            if (!preg_match('/^\s*$/', $between)) {
                $offset = $pos + 1; // skip this '@' occurrence
                continue;
            }

            // Walk forward to find the matching ')'
            $i = $openPos + 1;
            $len = strlen($subject);
            $depth = 1;
            while ($i < $len && $depth > 0) {
                $ch = $subject[$i];
                if ($ch === '(') {
                    $depth++;
                }
                elseif ($ch === ')') {
                    $depth--;
                }
                $i++;
            }

            if ($depth !== 0) {
                // Unbalanced parentheses — abort to avoid infinite loop
                $offset = $openPos + 1;
                continue;
            }

            $closePos = $i - 1;
            // extract the expression (between openPos+1 .. closePos-1)
            $expr = substr($subject, $openPos + 1, $closePos - $openPos - 1);

            // produce replacement using callback
            $replacement = $callback($expr);

            // Replace from $pos up to $closePos (inclusive)
            $subject = substr_replace(
                $subject,
                $replacement,
                $pos,
                $closePos - $pos + 1
            );

            // move offset past the replacement to avoid infinite loop
            $offset = $pos + strlen($replacement);
        }

        return $subject;
    }

}