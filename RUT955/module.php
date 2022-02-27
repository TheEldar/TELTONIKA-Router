<?php

declare(strict_types=1);

/*
 * @addtogroup TELTONIKA
 * @{
 *
 * @package       TELTONIKA
 * @file          module.php
 * @author        Steffen Langheld
 * @copyright     2021 Steffen Langheld
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 * @version       1.0
 *
 */
require_once __DIR__ . '/../libs/TELTONIKAModule.php';  // diverse Klassen

/** 
 * RUT955 ist die Klasse für die Router des Typs RUT955 der Firma TELTONIKA Networks mit Modbus
 * Erweitert TELTONIKA.
 */
class RUT955 extends TELTONIKA
{
    const PREFIX = 'RUT955';

    public static $Variables = [
        ['System uptime', VARIABLETYPE_INTEGER, '', 0x0001, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile signal strength', VARIABLETYPE_INTEGER, 'RSSI', 0x0003, 3, 2, true, 'INTEGER'],
        ['System temperature', VARIABLETYPE_FLOAT, '~Temperature', 0x0005, 3, 2, true, 'FLOAT_Temp'],
        ['System hostname', VARIABLETYPE_STRING, '', 0x0007, 3, 16, true, 'STRING'],
        ['GSM operator name', VARIABLETYPE_STRING, '', 0x0017, 3, 16, true, 'STRING'],
        ['Router serial number', VARIABLETYPE_STRING, '', 0x0027, 3, 16, true, 'STRING'],
        ['LAN MAC address', VARIABLETYPE_STRING, '', 0x0037, 3, 16, true, 'STRING'],
        ['Router name', VARIABLETYPE_STRING, '', 0x0047, 3, 16, true, 'STRING'],
        ['Currently active SIM card slot', VARIABLETYPE_STRING, '', 0x0057, 3, 16, true, 'STRING'],
        ['Network registration info', VARIABLETYPE_STRING, '', 0x0067, 3, 16, true, 'STRING'],
        ['Network type', VARIABLETYPE_STRING, '', 0x0077, 3, 16, true, 'STRING'],
        ['Digital input DIN1 state', VARIABLETYPE_INTEGER, '', 0x0087, 3, 2, true, 'INTEGER'],
        ['Digital galvanically isolated input DIN2 state', VARIABLETYPE_INTEGER, '', 0x0089, 3, 2, true, 'INTEGER'],
        ['Current WAN IP address', VARIABLETYPE_INTEGER, '', 0x008B, 3, 2, true, 'IPAdress'],
        ['Analog input PIN 9 value', VARIABLETYPE_INTEGER, '', 0x008D, 3, 2, true, 'INTEGER_unsigned'],
        ['GPS latitude coordinate', VARIABLETYPE_FLOAT, 'GPSCords', 0x008F, 3, 2, true, 'FLOAT'],
        ['GPS longitude coordinate', VARIABLETYPE_FLOAT, 'GPSCords', 0x0091, 3, 2, true, 'FLOAT'],
        ['GPS fix time', VARIABLETYPE_STRING, '', 0x0093, 3, 16, true, 'STRING'],
        ['GPS date and time', VARIABLETYPE_STRING, '', 0x00A3, 3, 16, true, 'STRING'],
        ['GPS speed', VARIABLETYPE_INTEGER, '', 0x00B3, 3, 2, true, 'INTEGER'],
        ['GPS satellite count', VARIABLETYPE_INTEGER, '', 0x00B5, 3, 2, true, 'INTEGER_unsigned'],
        ['GPS accuracy', VARIABLETYPE_INTEGER, '', 0x00B7, 3, 2, true, 'FLOAT'],
        ['Mobile data received today SIM1', VARIABLETYPE_INTEGER, '', 0x00B9, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent today SIM1', VARIABLETYPE_INTEGER, '', 0x00BB, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received this week SIM1', VARIABLETYPE_INTEGER, '', 0x00BD, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent this week SIM1', VARIABLETYPE_INTEGER, '', 0x00BF, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received this month SIM1', VARIABLETYPE_INTEGER, '', 0x00C1, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent this month SIM1', VARIABLETYPE_INTEGER, '', 0x00C3, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received last 24h SIM1', VARIABLETYPE_INTEGER, '', 0x00C5, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent last 24h SIM1', VARIABLETYPE_INTEGER, '', 0x00C7, 3, 2, true, 'INTEGER_unsigned'],
        ['Galvanically isolated open collector output status', VARIABLETYPE_INTEGER, '', 0x00C9, 3, 1, true, 'INTEGER'],
        ['Relay output status', VARIABLETYPE_INTEGER, '', 0x00CA, 3, 1, true, 'INTEGER'],
        ['Active SIM card', VARIABLETYPE_INTEGER, '', 0x00CD, 3, 1, true, 'INTEGER'],
        ['Mobile data received last week SIM1', VARIABLETYPE_INTEGER, '', 0x0124, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent last week SIM1', VARIABLETYPE_INTEGER, '', 0x0126, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received last month SIM1', VARIABLETYPE_INTEGER, '', 0x0128, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent last month SIM1', VARIABLETYPE_INTEGER, '', 0x012A, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received today SIM2', VARIABLETYPE_INTEGER, '', 0x012C, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent today SIM2', VARIABLETYPE_INTEGER, '', 0x012E, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received this week SIM2', VARIABLETYPE_INTEGER, '', 0x0130, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent this week SIM2', VARIABLETYPE_INTEGER, '', 0x0132, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received this month SIM2', VARIABLETYPE_INTEGER, '', 0x0134, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent this month SIM2', VARIABLETYPE_INTEGER, '', 0x0136, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received last 24h SIM2', VARIABLETYPE_INTEGER, '', 0x0138, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent last 24h SIM2', VARIABLETYPE_INTEGER, '', 0x013A, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received last week SIM2', VARIABLETYPE_INTEGER, '', 0x013C, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent last week SIM2', VARIABLETYPE_INTEGER, '', 0x013E, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data received last monthSIM2', VARIABLETYPE_INTEGER, '', 0x0140, 3, 2, true, 'INTEGER_unsigned'],
        ['Mobile data sent last month SIM2', VARIABLETYPE_INTEGER, '', 0x0142, 3, 2, true, 'INTEGER_unsigned'],
        ['Digital non isolated input 4 PIN connector', VARIABLETYPE_INTEGER, '', 0x0144, 3, 1, true, 'INTEGER'],
        ['Digital open collector output 4 PIN connector', VARIABLETYPE_INTEGER, '', 0x0145, 3, 1, true, 'INTEGER']
        /* Get a Timeout from System. Must be debugged - Temporary disabled 
        ['Modem ID', VARIABLETYPE_STRING, '', 0x0148, 3, 8, true, 'STRING'],
        ['IMSI', VARIABLETYPE_STRING, '', 0x015C, 3, 16, true, 'STRING'],
        ['Unix timestamp', VARIABLETYPE_INTEGER, '~UnixTimestamp', 0x016C, 3, 2, true, 'INTEGER_unsigned'],
        ['Local ISO time', VARIABLETYPE_STRING, '', 0x016E, 3, 12, true, 'STRING'],
        ['UTC time', VARIABLETYPE_STRING, '', 0x017A, 3, 12, true, 'STRING']
        */   
    ];
}
