<?php

/**
 * Model for ESC Seminar
 *
 * @author Scott Haefner <shaefner@usgs.gov>
 */
class Seminar {
  private $_data = [];

  public function __construct () {
    $datetime = $this->_data['datetime'];
    $timestamp = strtotime($datetime);

    $this->_data['date'] = date('l, F j', $timestamp);
    $this->_data['dateShort'] = date('D, M j', $timestamp);
    $this->_data['day'] = date('l', $timestamp);
    $this->_data['month'] = date('F', $timestamp);
    $this->_data['time'] = date('g:i A', $timestamp);
    $this->_data['timestamp'] = $timestamp;
    $this->_data['year'] = date('Y', $timestamp);

    $videoDomain = 'http://media.wr.usgs.gov';
    $videoPath = '/ehz/' . $this->_data['year'];
    $videoFile = str_replace('-', '', substr($datetime, 0, 10)) . '.mp4';

    $this->_data['videoSrc'] = $videoDomain . $videoPath . '/' . $videoFile;
    $this->_data['videoTrack'] = str_replace('mp4', 'vtt', $this->_data['videoSrc']);

    $this->_addAffiliation();
  }

  // add affiliation to speaker field
  private function _addAffiliation () {
    $speaker = $this->_data['speaker'];
    if ($this->_data['affiliation']) {
      $speaker .= ', ' . $this->_data['affiliation'];
      $this->_data['speaker'] = $speaker;
    }
  }

  public function __get ($name) {
    return $this->_data[$name];
  }

  public function __set ($name, $value) {
    $this->_data[$name] = $value;
  }
}