pipeline {
    agent any

    environment {
        GITHUB_CREDENTIALS = 'github-credentials'
        DOCKERHUB_CREDENTIALS = credentials('dockerhub-credentials')
        IMAGE_NAME = 'thilakshan28/blog' 
    }

    stages {
        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --no-progress --prefer-dist'
            }
        }

        // stage('Run Tests') {
        //     steps {
        //         script {
        //             sh 'composer require --dev phpunit/phpunit:^10 --no-progress --prefer-dist'
        //         }
        //         sh './vendor/bin/phpunit'
        //     }
        // }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t ${IMAGE_NAME}:latest .'
            }
        }

        stage('Deploy Locally') {
            steps {
                sh 'docker compose down || true'
                sh 'docker compose up -d' 
            }
        }

        stage('Test Docker') {
            steps {
                sh 'docker ps'
            }
        }

        stage('Push to Docker Hub') {
            steps {
                script {
                    sh """
                    echo ${DOCKERHUB_CREDENTIALS_PSW} | docker login -u ${DOCKERHUB_CREDENTIALS_USR} --password-stdin
                    docker push ${IMAGE_NAME}:latest
                    docker logout
                    """
                }
            }
        }
    }
}
