AWS()                                                                    AWS()



NNAAMMEE
       aws -

DDEESSCCRRIIPPTTIIOONN
       The  AWS  Command  Line  Interface is a unified tool to manage your AWS
       services.

SSYYNNOOPPSSIISS
          aws [options] <command> <subcommand> [parameters]

       Use _a_w_s _c_o_m_m_a_n_d _h_e_l_p for information on a  specific  command.  Use  _a_w_s
       _h_e_l_p  _t_o_p_i_c_s  to view a list of available help topics. The synopsis for
       each command shows its parameters and their usage. Optional  parameters
       are shown in square brackets.

OOPPTTIIOONNSS
       ----ddeebbuugg (boolean)

       Turn on debug logging.

       ----eennddppooiinntt--uurrll (string)

       Override command's default URL with the given URL.

       ----nnoo--vveerriiffyy--ssssll (boolean)

       By  default, the AWS CLI uses SSL when communicating with AWS services.
       For each SSL connection, the AWS CLI will verify SSL certificates. This
       option overrides the default behavior of verifying SSL certificates.

       ----nnoo--ppaaggiinnaattee (boolean)

       Disable automatic pagination.

       ----oouuttppuutt (string)

       The formatting style for command output.

       +o json

       +o text

       +o table

       ----qquueerryy (string)

       A JMESPath query to use in filtering the response data.

       ----pprrooffiillee (string)

       Use a specific profile from your credential file.

       ----rreeggiioonn (string)

       The region to use. Overrides config/env settings.

       ----vveerrssiioonn (string)

       Display the version of this tool.

       ----ccoolloorr (string)

       Turn on/off color output.

       +o on

       +o off

       +o auto

       ----nnoo--ssiiggnn--rreeqquueesstt (boolean)

       Do  not  sign requests. Credentials will not be loaded if this argument
       is provided.

       ----ccaa--bbuunnddllee (string)

       The CA certificate bundle to use when verifying SSL certificates. Over-
       rides config/env settings.

       ----ccllii--rreeaadd--ttiimmeeoouutt (int)

       The  maximum socket read time in seconds. If the value is set to 0, the
       socket read will be blocking and not timeout.

       ----ccllii--ccoonnnneecctt--ttiimmeeoouutt (int)

       The maximum socket connect time in seconds. If the value is set  to  0,
       the socket connect will be blocking and not timeout.

AAVVAAIILLAABBLLEE SSEERRVVIICCEESS
       +o acm

       +o acm-pca

       +o alexaforbusiness

       +o amplify

       +o apigateway

       +o apigatewaymanagementapi

       +o apigatewayv2

       +o application-autoscaling

       +o appmesh

       +o appstream

       +o appsync

       +o athena

       +o autoscaling

       +o autoscaling-plans

       +o backup

       +o batch

       +o budgets

       +o ce

       +o chime

       +o cloud9

       +o clouddirectory

       +o cloudformation

       +o cloudfront

       +o cloudhsm

       +o cloudhsmv2

       +o cloudsearch

       +o cloudsearchdomain

       +o cloudtrail

       +o cloudwatch

       +o codebuild

       +o codecommit

       +o codepipeline

       +o codestar

       +o cognito-identity

       +o cognito-idp

       +o cognito-sync

       +o comprehend

       +o comprehendmedical

       +o configservice

       +o configure

       +o connect

       +o cur

       +o datapipeline

       +o datasync

       +o dax

       +o deploy

       +o devicefarm

       +o directconnect

       +o discovery

       +o dlm

       +o dms

       +o docdb

       +o ds

       +o dynamodb

       +o dynamodbstreams

       +o ec2

       +o ecr

       +o ecs

       +o efs

       +o eks

       +o elasticache

       +o elasticbeanstalk

       +o elastictranscoder

       +o elb

       +o elbv2

       +o emr

       +o es

       +o events

       +o firehose

       +o fms

       +o fsx

       +o gamelift

       +o glacier

       +o globalaccelerator

       +o glue

       +o greengrass

       +o guardduty

       +o health

       +o help

       +o history

       +o iam

       +o importexport

       +o inspector

       +o iot

       +o iot-data

       +o iot-jobs-data

       +o iot1click-devices

       +o iot1click-projects

       +o iotanalytics

       +o kafka

       +o kinesis

       +o kinesis-video-archived-media

       +o kinesis-video-media

       +o kinesisanalytics

       +o kinesisanalyticsv2

       +o kinesisvideo

       +o kms

       +o lambda

       +o lex-models

       +o lex-runtime

       +o license-manager

       +o lightsail

       +o logs

       +o machinelearning

       +o macie

       +o marketplace-entitlement

       +o marketplacecommerceanalytics

       +o mediaconnect

       +o mediaconvert

       +o medialive

       +o mediapackage

       +o mediastore

       +o mediastore-data

       +o mediatailor

       +o meteringmarketplace

       +o mgh

       +o mobile

       +o mq

       +o mturk

       +o neptune

       +o opsworks

       +o opsworks-cm

       +o organizations

       +o pi

       +o pinpoint

       +o pinpoint-email

       +o pinpoint-sms-voice

       +o polly

       +o pricing

       +o quicksight

       +o ram

       +o rds

       +o rds-data

       +o redshift

       +o rekognition

       +o resource-groups

       +o resourcegroupstaggingapi

       +o robomaker

       +o route53

       +o route53domains

       +o route53resolver

       +o s3

       +o s3api

       +o s3control

       +o sagemaker

       +o sagemaker-runtime

       +o sdb

       +o secretsmanager

       +o securityhub

       +o serverlessrepo

       +o servicecatalog

       +o servicediscovery

       +o ses

       +o shield

       +o signer

       +o sms

       +o snowball

       +o sns

       +o sqs

       +o ssm

       +o stepfunctions

       +o storagegateway

       +o sts

       +o support

       +o swf

       +o textract

       +o transcribe

       +o transfer

       +o translate

       +o waf

       +o waf-regional

       +o workdocs

       +o worklink

       +o workmail

       +o workspaces

       +o xray

SSEEEE AALLSSOO
       +o aws help topics



                                                                         AWS()
