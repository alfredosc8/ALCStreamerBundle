<?php
namespace ALC\StreamerBundle\Streamer;

/**
 * A class to provide functionality for getting information about streamer stations.
 *
 * @author Lee Conlin <lee@wildkatz.org>
 */
class StreamerStatus
{
    /**
     * StreamID
     * @var string
     */
    private $streamidv1;

    /**
     * online
     * @var boolean
     */
    private $onlinev1 = false;

    /**
     * Station Name
     * @var string
     */
    private $stationnamev1 = '';

    /**
     * P2P URL
     * @var string
     */
    private $p2purlv1 = '';

    /**
     * Now Playing
     * @var string
     */
    private $nowplayingv1 = '';
    /**
     * StreamID
     * @var string
     */
    private $streamidv2;

    /**
     * online
     * @var boolean
     */
    private $onlinev2 = false;

    /**
     * Station Name
     * @var string
     */
    private $stationnamev2 = '';

    /**
     * P2P URL
     * @var string
     */
    private $p2purlv2 = '';

    /**
     * Now Playing
     * @var string
     */
    private $nowplayingv2 = '';

    /**
     * Default constructor
     *
     * @param string $streamid The StreamID of the station
     */
    public function __construct($streamidv1, $streamidv2)
    {
        if (empty($streamidv1) && empty($streamidv2)) {
            throw new \Exception('Cannot construct class \'\ALC\StreamerBundle\Streamer\StreamerStatus\' without at least 1 stream id.');
        }
        $this->streamidv1 = $streamidv1;
        $this->streamidv2 = $streamidv2;
        $this->fetchInfo();
    }

    /**
     * Retrieves the XML data from streamerp2p.de and caches it in member variables.
     */
    private function fetchInfo()
    {
         $x0d="\163\151\x6d\x70\154\145\x78\x6dl_lo\141d_\146\x69\154e"; $x0e="\165rlde\x63o\144\x65"; 
		if (!empty($this->streamidv1)) {$x0b = $x0d("\x68\x74t\x70\x3a\x2f\x2f\x73\x74r\x65\x61\155\x65rp2\x70\x2e\x64e/wi\144g\145\x74\x2f\151\156\146o\056ph\x70\x3f\151d=".$this->streamidv1);$this->onlinev1 = $x0b->item->status == 'online'?true:false;$this->stationnamev1 = $x0e($x0b->item->stationname);$this->nowplayingv1 = $x0e($x0b->item->nowplaying);$this->p2purlv1 = $x0e($x0b->item->p2purl);}if (!empty($this->streamidv2)) {$x0c = $x0d("ht\164\x70\072/\057\x73\x74\162\145\x61\x6derp\062p.\x64\x65\x2f\167i\144ge\x74\057\x69\156fo.\160\x68\160?i\x64\x3d".$this->streamidv2);$this->onlinev2 = $x0c->item->status == 'online'?true:false;$this->stationnamev2 = $x0e($x0c->item->stationname);$this->nowplayingv2 = $x0e($x0c->item->nowplaying);$this->p2purlv2 = $x0e($x0c->item->p2purl);}
    }

    /**
     * Gets the online/offline status of a station
     *
     * @return boolean True if station is online, otherwise false.
     */
    public function isV1Online()
    {
        return $this->onlinev1;
    }

    /**
     * Gets the online/offline status of a station
     *
     * @return boolean True if station is online, otherwise false.
     */
    public function isV2Online()
    {
        return $this->onlinev2;
    }

    /**
     * nowPlaying
     *
     * @return string The name of the track now playing on the station
     */
    public function V1NowPlaying()
    {
        return $this->nowplayingv1;
    }

    /**
     * nowPlaying
     *
     * @return string The name of the track now playing on the station
     */
    public function V2NowPlaying()
    {
        return $this->nowplayingv2;
    }

    /**
     * getStreamUrl
     *
     * @return strng A streamerp2p:// application URL to auto-tune to the station
     */
    public function getV1StreamUrl()
    {
        return $this->p2purlv1;
    }

    /**
     * getStreamUrl
     *
     * @return strng A streamerp2p:// application URL to auto-tune to the station
     */
    public function getV2StreamUrl()
    {
        return $this->p2purlv2;
    }
}