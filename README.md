# Project Overlay Banner

A REDCap module to display a temporary overlay banner on a project to alert users that it is a training or other non-production project. This module is designed to be enabled and configured at the project-level where it is needed. It was created to reduce the risk of data entry in training projects that look and behave like the production project.

## Prerequisites
- REDCap >= 9.3.0
- REDCap Module Framework version 3

## Easy installation
- Install the Project Overlay Banner module from the Consortium [REDCap Repo](https://redcap.vanderbilt.edu/consortium/modules/index.php) from the control center.
- Go to **Control Center > External Modules**, enable Project Overlay Banner.

## Manual Installation
- Clone this repo into to `<redcap-root>/modules/project_overlay_banner_v0.0.0`.
- Go to **Control Center > External Modules**, enable Project Overlay Banner.


## Configuration

This module can be configured at the global level and/or at the project level. Left unconfigured, it will display the default styling and text for the banner. If configured at the system level, that configuration will override the built-in default. Similarly, it can be configured at the project level to override any built-in or system configuration. REDCap admins can enforce the system configuraiton if needed.

These options are available:

???insert image of system config page here???

## Example

In its default configuration, the temporary banner looks like this:

???insert image of configured project here???

Upon clicking the baner, it will disappear and the page will function normally. At the next page load and at _every_ page load for a configured project, the banner will reappear.
