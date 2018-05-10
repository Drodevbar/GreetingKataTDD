<?php

namespace Kata\Tests;

use PHPUnit\Framework\TestCase;
use Kata\GreetingBot;

class GreetingBotTest extends TestCase
{
    /**
     * @test
     */
    public function itInterpolatesGivenNameInAGreeting()
    {
        $answer = $this->getAnswerForName("Bart");

        $this->assertEquals("Hello, Bart.", $answer);
    }

    /**
     * @test
     */
    public function itHandlesNullName()
    {
        $answer = $this->getAnswerForName(null);

        $this->assertEquals("Hello, my friend.", $answer);
    }

    /**
     * @test
     */
    public function itHandlesShoutingWhenGivenNameIsAllUppercase()
    {
        $answer = $this->getAnswerForName("BART");

        $this->assertEquals("HELLO BART!", $answer);
    }

    /**
     * @test
     */
    public function itHandlesExactlyTwoNames()
    {
        $answer = $this->getAnswerForMultipleNames(["Bart", "Amy"]);

        $this->assertEquals("Hello, Bart and Amy.", $answer);
    }

    /**
     * @test
     */
    public function itHandlesMoreThanTwoNames()
    {
        $answer = $this->getAnswerForMultipleNames(["Bart", "Amy", "Nicole"]);

        $this->assertEquals("Hello, Bart, Amy, and Nicole.", $answer);
    }

    /**
     * @test
     */
    public function inHandlesExactlyTwoShoutedNames()
    {
        $answer = $this->getAnswerForMultipleNames(["BART", "AMY"]);

        $this->assertEquals("HELLO BART AND AMY!", $answer);
    }

    /**
     * @test
     */
    public function inHandlesMoreThanTwoShoutedNames()
    {
        $answer = $this->getAnswerForMultipleNames(["BART", "AMY", "NICOLE"]);

        $this->assertEquals("HELLO BART, AMY, AND NICOLE!", $answer);
    }

    /**
     * @test
     */
    public function itHandlesMultipleNamesBothNormalAndShouted()
    {
        $answer = $this->getAnswerForMultipleNames(["Bart", "Kate", "AMY", "Nicole", "TED"]);

        $this->assertEquals("Hello, Bart, Kate, and Nicole. AND HELLO AMY AND TED!", $answer);
    }

    private function getAnswerForName(?string $name) : string
    {
        $bot = new GreetingBot();

        return $bot->greet($name);
    }

    private function getAnswerForMultipleNames(array $names) : string
    {
        $bot = new GreetingBot();

        return $bot->greet($names);
    }
}
