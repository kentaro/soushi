<?php

namespace Soushi;

interface File
{
    function isPage(): bool;
    function path():   string;
}
