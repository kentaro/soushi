<?php
namespace Soushi;

interface File
{
    function isEntry(): bool;
    function path(): string;
}
