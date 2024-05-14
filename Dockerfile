FROM php:8.2-cli

RUN apt update && apt install -y wget git

RUN wget https://raw.githubusercontent.com/php-opencv/php-opencv-packages/master/opencv_4.7.0_amd64.deb && \
    dpkg -i opencv_4.7.0_amd64.deb && \
    rm opencv_4.7.0_amd64.deb

RUN git clone https://github.com/php-opencv/php-opencv.git && \
    cd php-opencv && \
    phpize && \
    ./configure --with-php-config=/usr/local/bin/php-config && \
    make && \
    make install && \
    docker-php-ext-enable opencv
