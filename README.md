# CacheDebug
Magento 2 Module : Debug Cache

## Description
This module allow you to find blocks without cachekey or cachelifetime.
These blocks are not cached.

## Configuration
After installation has completed go to : 

#### Step 1
* Admin > Stores > Settings > Configuration
* TheCactus117 > CacheDebug
* Enabled cache block debug : **Yes**
    > **Debug Type :** Log files will be written into */var/cache/cachedebug.log*

#### Step 2
* Admin > System > Cache Management
* Disable Full Page Cache

#### Step 3
* Load the page you want to debug