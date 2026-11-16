<?php

namespace App\Seo;

use App\ApiReference\Reference;

/**
 * /llms-full.txt: the whole reference in one Markdown document — every guide, then
 * every endpoint with its parameters, request body, curl request, PHP SDK call and
 * example answers — so an AI assistant or crawler gets all of it in one read.
 *
 * Texts are the store's own Markdown (the `…Markdown` keys of the reference file),
 * never HTML turned back into text.
 */
final class LlmsFullTxt
{
    public static function build(Reference $reference): string
    {
        $out = [
            '# '.config('brand.site_name').' — full reference',
            '',
            LlmsTxt::summary($reference),
            '',
            'This file holds every guide and every endpoint of the reference. The index, with one line per page, is '.SiteUrl::route('llms').'.',
        ];

        foreach ($reference->guides() as $guide) {
            array_push($out, '', '## Guide: '.$guide['title'], '', 'Page: '.SiteUrl::route('guide', $guide['slug']), '', rtrim($guide['markdown']));
        }

        foreach (['customer' => 'Customer API', 'admin' => 'Admin API'] as $audience => $group) {
            foreach ($reference->sections($audience) as $section) {
                array_push($out, '', '## '.$group.': '.$section['name']);
                if ($section['description'] !== null) {
                    array_push($out, '', $section['description']);
                }
                foreach ($section['operations'] as $operation) {
                    array_push($out, ...self::operation($section, $operation));
                }
            }
        }

        return implode("\n", $out)."\n";
    }

    private static function operation(array $section, array $operation): array
    {
        $out = [
            '',
            '### '.$operation['summary'],
            '',
            '`'.$operation['method'].' '.$operation['path'].'`'.($operation['public'] ? ' (no API token needed)' : ''),
            '',
            'Page: '.SiteUrl::route('operation', [$section['slug'], $operation['slug']]),
        ];
        if ($operation['descriptionMarkdown'] !== null) {
            array_push($out, '', rtrim($operation['descriptionMarkdown']));
        }

        if ($operation['parameters'] !== []) {
            array_push($out, '', '#### Parameters', '');
            foreach ($operation['parameters'] as $field) {
                $out[] = self::field($field);
            }
        }
        foreach ($operation['bodies'] as $body) {
            array_push($out, '', '#### Request body (`'.$body['type'].'`)', '');
            foreach ($body['fields'] as $field) {
                $out[] = self::field($field);
            }
            if ($body['moreMarkdown'] !== null) {
                array_push($out, '', rtrim($body['moreMarkdown']));
            }
        }

        foreach ($operation['samples'] as $sample) {
            array_push($out, '', '#### Request ('.$sample['label'].')', '', ...self::fence('bash', $sample['code']));
        }
        foreach ($operation['codeSamples'] as $sample) {
            array_push($out, '', '#### '.$sample['label'], '', ...self::fence('php', $sample['source']));
        }

        array_push($out, '', '#### Responses');
        foreach ($operation['responses'] as $response) {
            array_push($out, '', '`'.$response['status'].'`: '.rtrim($response['descriptionMarkdown']));
            if ($response['example'] !== null) {
                array_push($out, '', ...self::fence('json', $response['example']));
            }
        }

        return $out;
    }

    private static function field(array $field): string
    {
        $facts = [$field['type']];
        if ($field['in'] !== 'body') {
            $facts[] = $field['in'];
        }
        $facts[] = $field['required'] ? 'required' : 'optional';
        if ($field['default'] !== null) {
            $facts[] = 'default `'.$field['default'].'`';
        }
        $line = '- `'.$field['name'].'` ('.implode(', ', $facts).')';

        if ($field['descriptionMarkdown'] === null) {
            return $line;
        }

        // A description on several lines stays inside its list item: the lines after
        // the first are indented.
        return $line.': '.str_replace("\n", "\n  ", rtrim($field['descriptionMarkdown']));
    }

    /** A fenced code block, its fence longer than any run of backticks in the code. */
    private static function fence(string $lang, string $code): array
    {
        preg_match_all('/`+/', $code, $runs);
        $longest = $runs[0] === [] ? 0 : max(array_map('strlen', $runs[0]));
        $fence = str_repeat('`', max(3, $longest + 1));

        return [$fence.$lang, rtrim($code), $fence];
    }
}
