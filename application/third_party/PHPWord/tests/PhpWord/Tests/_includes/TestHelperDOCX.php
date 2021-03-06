<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Tests;

use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;

/**
 * Test helper class
 */
class TestHelperDOCX
{
    /**
     * Temporary file name
     *
     * @var string
     */
    static protected $file;

    /**
     * Get document content
     *
     * @since 0.12.0 Throws CreateTemporaryFileException.
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     * @param string $writerName
     * @return \PhpOffice\PhpWord\Tests\XmlDocument
     * @throws \PhpOffice\PhpWord\Exception\CreateTemporaryFileException
     */
    public static function getDocument(PhpWord $phpWord, $writerName = 'Word2007')
    {
        self::$file = tempnam(Settings::getTempDir(), 'PhpWord');
        if (false === self::$file) {
            throw new CreateTemporaryFileException();
        }

        if (!is_dir(Settings::getTempDir() . '/PhpWord_Unit_Test/')) {
            mkdir(Settings::getTempDir() . '/PhpWord_Unit_Test/');
        }

        $xmlWriter = IOFactory::createWriter($phpWord, $writerName);
        $xmlWriter->save(self::$file);

        $zip = new \ZipArchive;
        $res = $zip->open(self::$file);
        if ($res === true) {
            $zip->extractTo(Settings::getTempDir() . '/PhpWord_Unit_Test/');
            $zip->close();
        }

        return new XmlDocument(Settings::getTempDir() . '/PhpWord_Unit_Test/');
    }

    /**
     * Clear document
     */
    public static function clear()
    {
        if (file_exists(self::$file)) {
            unlink(self::$file);
        }
        if (is_dir(Settings::getTempDir() . '/PhpWord_Unit_Test/')) {
            self::deleteDir(Settings::getTempDir() . '/PhpWord_Unit_Test/');
        }
    }

    /**
     * Delete directory
     *
     * @param string $dir
     */
    public static function deleteDir($dir)
    {
        foreach (scandir($dir) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            } elseif (is_file($dir . "/" . $file)) {
                unlink($dir . "/" . $file);
            } elseif (is_dir($dir . "/" . $file)) {
                self::deleteDir($dir . "/" . $file);
            }
        }

        rmdir($dir);
    }

    /**
     * Get file
     *
     * @return string
     */
    public static function getFile()
    {
        return self::$file;
    }
}
