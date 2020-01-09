pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        echo 'npm install'
      }
    }
    stage('Test') {
      steps {
        echo 'test'
      }
    }
    def tag = sh(returnStdout: true, script: "git tag --contains | head -1").trim()
    if (tag.contains("dev-")) {
      stage("Deploy DEV") {
        steps {
          echo "Deploying to DEV Env"
        }
      }
    } else if (tag.contains("qa-")) {
      stage("Deploy QA") {
        steps {
          echo "Deploying to QA Env"
        }
      }
    }
  }
