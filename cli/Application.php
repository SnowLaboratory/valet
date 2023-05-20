<?php

namespace Valet;

use Silly\Application as SillyApplication;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends SillyApplication
{
    public function runCommandWithArgs($command, array $args, OutputInterface $output = null)
    {
        $input = new StringInput($command);

        $options = array_filter($args);

        $command = $this->find($this->getCommandName($input));

        return $command->run(new ArrayInput($options), $output ?: new NullOutput());
    }

    public function runCommand($command, OutputInterface|array $argsOrOutput = null, OutputInterface $output=null)
    {
        if (!($argsOrOutput instanceof OutputInterface)) {
            return $this->runCommandWithArgs($command, $argsOrOutput, $output);
        }

        $input = new StringInput($command);

        $command = $this->find($this->getCommandName($input));

        return $command->run(new ArrayInput($input->getArguments()), $output ?: new NullOutput());
    }
}
