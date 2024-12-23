pipeline {
    agent any  // Menentukan agen untuk menjalankan pipeline, bisa diubah sesuai kebutuhan
    environment {
        DOCKER_IMAGE = "atoz_fix"  // Nama image Docker yang akan dibangun
        DOCKER_REGISTRY = 'docker.io' // Menentukan registry Docker
        DOCKER_REPO = 'angga0806/atoz_fix' // Menentukan nama repository Docker
        DOCKER_CREDENTIALS = 'angga0806' // ID kredensial di Jenkins untuk login ke Docker registry
    }

    stages {
        stage('Git Checkout') {
            steps {
                git branch: 'main', changelog: false, poll: false, url: 'https://github.com/Gezod/komputasi_awan'
            }

        }

        stage('Build Docker Image') {
            steps {
                script {
                    // Menjalankan perintah Docker build dengan nama image 'atoz_fix'
                    docker.build("atoz_fix", ".")
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    // Login ke Docker registry dan push image ke repository
                   docker.withRegistry('', 'angga0806') {
                        docker.image("${DOCKER_REPO}:latest").push()
                    }
                }
            }
        }

        stage('Maven Build with Docker') {
            steps {
                script {
                    // Mengonversi path Windows ke format Unix untuk digunakan Docker
                    def workspaceUnix = "${env.WORKSPACE}".replace('\\', '/').replaceAll('C:', '/mnt/c')
                    docker.image('maven:3.8.5-openjdk-11').inside("--workdir ${workspaceUnix}") {
                        sh 'mvn clean install -DskipTests'
                    }
                }
            }
        }
    }
    
}
