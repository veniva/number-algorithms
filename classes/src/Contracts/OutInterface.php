<?php

namespace Classes\Contracts;

interface OutInterface extends PrimesInterface
{
    function firstRow(): string;
    function tableGrid(): string;
}