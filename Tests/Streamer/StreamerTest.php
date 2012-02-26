<?php
namespace ALC\StreamerBundle\Tests\Streamer;

use ALC\StreamerBundle\Streamer\StreamerStatus;

/**
 * Test cases for Streamer.php
 *
 * @author Lee Conlin <lee@wildkatz.org>
 */
class StreamerTest extends \ALC\StreamerBundle\Tests\BaseTestCase
{
    /**
     * Test the "isOnline()" method
     */
    public function testIsOnline()
    {
        $streamerOffline = new StreamerStatus("lawekklj2sd3hg4jkla5dhsf6lkjh7asd", "lawekklj2sd3hg4jkla5dhsf6lkjh7asd"); // One that we know won't exist
        $this->assertFalse($streamerOffline->isV1Online());
        $this->assertFalse($streamerOffline->isV2Online());

        $streamerOnline = $this->get('alc_streamer'); // RPR - should always be online
        $this->assertTrue($streamerOnline->isV1Online());
        $this->assertTrue($streamerOnline->isV2Online());
    }

    /**
     * Test the "nowPlaying()" method
     */
    public function testNowPlaying()
    {
        $streamerOnline = $this->get('alc_streamer'); // RPR - should always be online
        $this->assertTrue(is_string($streamerOnline->V1NowPlaying()));
        $this->assertNotEmpty($streamerOnline->V1NowPlaying());
        $this->assertTrue(is_string($streamerOnline->V2NowPlaying()));
        $this->assertNotEmpty($streamerOnline->V2NowPlaying());
    }

    /**
     * Test the "getStreamUrl()" method
     */
    public function testGetStreamUrl()
    {
        $streamerOnline = $this->get('alc_streamer'); // RPR - should always be online
        $this->assertStringStartsWith('streamerp2p://s=', $streamerOnline->getV1StreamUrl());
        $this->assertStringStartsWith('streamerp2pbeta://s=', $streamerOnline->getV2StreamUrl());
    }
}
