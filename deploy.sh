#!/usr/bin/env bash

git push heroku `git subtree split --prefix laravel master`:master --force

