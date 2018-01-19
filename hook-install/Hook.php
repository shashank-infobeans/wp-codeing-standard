<?php

namespace CustomHook\PreCommitHook;

class Hook
{

    public static function run()
    {
        $rule_remote_host = 'http://172.16.2.115/';
        $target_dir       = getcwd().DIRECTORY_SEPARATOR.'.git'.DIRECTORY_SEPARATOR.'hooks';
        $pre_commit_hook  = file_get_contents($rule_remote_host.'pre-commit');
        $pre_commit_hook  = str_replace('[RULE-REMOTE-HOST]', $rule_remote_host,
            $pre_commit_hook);
        file_put_contents(__DIR__.DIRECTORY_SEPARATOR.'pre-commit', $pre_commit_hook);
        copy(__DIR__.DIRECTORY_SEPARATOR.'pre-commit',
            $target_dir.DIRECTORY_SEPARATOR.'pre-commit');
        chmod($target_dir.DIRECTORY_SEPARATOR.'pre-commit', 0775);
    }
}