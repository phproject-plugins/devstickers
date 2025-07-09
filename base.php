<?php

/**
 * @package  DevStickers
 * @author   Alan Hardman <alan@phpizza.com>
 * @version  1.0.0
 */

namespace Plugin\DevStickers;

class Base extends \Plugin
{
    /**
     * Initialize the plugin
     */
    public function _load()
    {
        $this->_hook("text.parse.after", fn(string $str): ?string => preg_replace_callback("/:(404|btb|cannot-reproduce|codepush|compiling|facepalm|hack|helloworld|hotfix-denied|hotfix|idk|itrl|iwy|lgtm|loading|null|outofscope|plzwork|review|shipit|wfm|woot):/", function (array $matches): string {
            $base = \Base::instance()->get("BASE");
            return "<img style=\"width: 90px; height: 90px;\" src=\"{$base}/app/plugin/devstickers/img/{$matches[1]}.png\" title=\"{$matches[0]}\" alt=\"{$matches[0]}\">";
        }, $str));
    }
}
